<?php
someloader('some.application.model');
someloader('notemanager.csrf');

class SomeModelNote extends SomeModel {

    public $id = -1;
    public $title = '';
    public $body = '';
    public $secret = true;
    public $tags = '';
    
    public $game_id = -1;
    public $game_name = '';
    
    public $image = '';
    
    public $new = true;
    public $notification = false;
    
    
    public function __construct(array $options=array()) {
        parent::__construct($options);
    }
    
    
    
    
    /**
     * Edits a note; if the id is not specified, creates a new one
     */
    public function editNote() {
        if (CSRF::checkToken())  {
            
            $game = SomeRow::getRow('game');
            $game->id = SomeRequest::getInt('id', '');


            if ($game->read()) {

                $this->game_id = $game->id;
                $this->game_name = $game->name;
                $this->new = true;

                $note_image = null;

                // Check whether this is an already existing note
                $note_id = SomeRequest::getInt('note_id', null);
                if (!is_null($note_id)) {
                    $this->new = false;
                    $note = SomeRow::getRow('note');
                    $note->id = $note_id;
                    $note->read();
                    $this->title = $note->title;
                    $this->body = $note->body;
                    $this->secret = $note->secret;
                    $this->tags = $note->tags;
                    $this->id = $note_id;
                    $note_image = $note->image;
                }



                // Create a new note or update existing one if receiving data from the form
                $title = SomeRequest::getString('title', '', 'post');
                if ($title != '') {
                    $note = SomeRow::getRow('note');
                    $note->id = $note_id;
                    $note->title = $title;
                    $note->game_id = $this->game_id;
                    $note->body = SomeRequest::getString('body', '', 'post', 4);
                    $note->secret = SomeRequest::getString('secret', 'off', 'post');
                    $note->secret = ($note->secret == 'on') ? 'TRUE' : 'FALSE';
                    $note->tags = SomeRequest::getString('tags', '', 'post');
                    $note->tags = str_replace(',', ', ', $note->tags);
                    $note->image = $note_image;

                    if (is_null($note_id)) {
                        if (!is_null($note->create())) {
                            $this->title = $title;
                            $this->notification = true;
                        }
                    }
                    else {
                        if ($note->update()) {
                            $this->notification = true;
                            $this->title = $note->title;
                            $this->body = $note->body;
                            $this->secret = $note->secret;
                            $this->tags = $note->tags;
                        }
                    }
                }
            }
        }
    }
    
    
    /**
     * Deletes the note with the specified id
     */
    public function deleteNote($id) {
        if (CSRF::checkToken()) {
            

            $confirmed = false;
            if ($id != -1) {
                $note = SomeRow::getRow('note');
                $note->id = $id;
                if ($note->read()) {

                    if (SomeRequest::getInt('confirm', -1) == 1) {

                        if (!is_null($note->image)) {
                            unlink("./content/notemanager/images/".$note->image);
                            unlink("./content/notemanager/images/thumbnails/".$note->image);
                        }
                        $note->delete();
                        $confirmed = true;
                    }
                }
            }


            $this->id = $note->id;
            $this->game_id = $note->game_id;
            $this->title = $note->title;
            $this->delete_confirmed = $confirmed;

            return $confirmed;
        }
    }
    
    
    
    /**
     * Returns commonly used note data from the database
     */
    public function getNoteData() {
        $note_id = SomeRequest::getInt('note_id');
        $note = SomeRow::getRow('note');
        $note->id = $note_id;
        $note->read();

        $game = SomeRow::getRow('game');
        $game->id = $note->game_id;
        $game->read();
        
        $this->id = $note->id;
        $this->title = $note->title;
        $this->game_id = $game->id;
        $this->game_name = $game->name;
        $this->image = $note->image;
    }
    
    
    /**
     * Loads an image related to a note
     * 
     */
    public function loadImage($id) {
            
        $note = SomeRow::getRow('note');
        $note->id = $id;
        $note->read();
        
        // File upload
        $file = SomeRequest::getVar('imagefile_' . $id, null, 'files');
        if (!is_null($file)) {
            if (is_uploaded_file($file['tmp_name'])) {

                $valid = false;

                // Images have a size limit of half a megabyte
                if (0 < $file['size'] && $file['size'] <= 524288) {

                    // Only JPG, GIF and PNG -files are allowed
                    $image_type = exif_imagetype($file['tmp_name']);
                    if ($image_type != FALSE && $image_type < 4) {
                        if (CSRF::checkToken()) {

                            $suffix = '.gif';
                            if ($image_type == 2) {
                                $suffix = '.jpg';
                            } else if ($image_type == 3) {
                                $suffix = '.png';
                            }

                            $new_name = ''.$id.$suffix;
                            $folder = './content/notemanager/images/';

                            // Remove previous image file and thumbnail
                            if (!is_null($note->image)) {
                                unlink($folder.$note->image);
                                unlink($folder.'thumbnails/'.$note->image);
                            }


                            // Update database and create thumbnail
                            $note->secret = $note->secret ? 'TRUE' : 'FALSE';
                            $note->image = $new_name;

                            if ($note->update()) {
                                move_uploaded_file($file['tmp_name'], $folder.$new_name);

                                // Thumbnail creation code from http://stackoverflow.com/questions/1855996/crop-image-in-php
                                $image = null;
                                switch ($image_type) {
                                    case 1: $image = imagecreatefromgif($folder.$new_name); break;
                                    case 2: $image = imagecreatefromjpeg($folder.$new_name); break;
                                    case 3: $image = imagecreatefrompng($folder.$new_name); break;
                                    default: break;
                                }

                                $thumb_width = 100;
                                $thumb_height = 50;

                                $width = imagesx($image);
                                $height = imagesy($image);

                                $original_aspect = $width / $height;
                                $thumb_aspect = $thumb_width / $thumb_height;

                                if ( $original_aspect >= $thumb_aspect )
                                {
                                   // If image is wider than thumbnail (in aspect ratio sense)
                                   $new_height = $thumb_height;
                                   $new_width = $width / ($height / $thumb_height);
                                }
                                else
                                {
                                   // If the thumbnail is wider than the image
                                   $new_width = $thumb_width;
                                   $new_height = $height / ($width / $thumb_width);
                                }

                                $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

                                // Resize and crop
                                imagecopyresampled($thumb,
                                                   $image,
                                                   0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                                                   0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                                                   0, 0,
                                                   $new_width, $new_height,
                                                   $width, $height);

                                switch ($image_type) {
                                    case 1: imagegif($thumb, $folder.'/thumbnails/'.$new_name); break;
                                    case 2: imagejpeg($thumb, $folder.'/thumbnails/'.$new_name); break;
                                    case 3: imagepng($thumb, $folder.'/thumbnails/'.$new_name); break;
                                    default: break;
                                }




                                $this->image_url = $new_name;
                                $valid = true;
                            } 
                        }
                    }
                }


                // Invalid image file
                if (!$valid) {
                    unlink($file['tmp_name']);
                    $this->notification = true;
                }
            }
        }
        
    }
    
    /**
     * Sets the note's secret
     */
    public function setSecret($id, $secret) {
        if (CSRF::checkToken()) {
            $note = SomeRow::getRow('note');
            $note->id = $id;
            $note->read();
            $note->secret = $secret;
            $note->update();
        }
    }
    
    
}