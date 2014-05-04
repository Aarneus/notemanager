<?php
someloader('some.application.controller');
someloader('some.database.row');
someloader('access.rbac');

class SomeControllerNoteManager extends SomeController {

	public function __construct() {
            parent::__construct();
	}
        
        
        public function creategame() {
            
            if (RBAC::hasAccess('create')) {
                $view = $this->getView('creategame');

                // Create a new game if receiving data from the form
                $name = SomeRequest::getString('name', '', 'post');
                if ($name != '') {
                    $game = SomeRow::getRow('game');
                    $game->name = $name;
                    if (!is_null($game->create())) {
                        $view->game_id = $game->id;
                        $view->game_name = $game->name;

                        $owner = SomeRow::getRow('owner');
                        $owner->game_id = $game->id;
                        $owner->user_id = SomeFactory::getUser()->getId();
                        $owner->create();
                    }
                }

                $view->display('default');
            }
        }
        
        
        
        public function editnote() {
            
            $id = SomeRequest::getInt('id', '');
            
            if (RBAC::hasAccess('edit', $id)) {
            
                $game = SomeRow::getRow('game');
                $game->id = $id;

                $view = $this->getView('editnote');

                if ($game->read()) {

                    $view->game_id = $game->id;
                    $view->game_name = $game->name;
                    $view->new = true;
                    
                    $note_image = null;

                    $note_id = SomeRequest::getInt('note_id', null);
                    if (!is_null($note_id)) {
                        $view->new = false;
                        $note = SomeRow::getRow('note');
                        $note->id = $note_id;
                        $note->read();
                        $view->note_title = $note->title;
                        $view->note_body = $note->body;
                        $view->note_secret = $note->secret;
                        $view->note_tags = $note->tags;
                        $view->note_id = $note_id;
                        $note_image = $note->image;
                    }



                    // Create a new note or update existing one if receiving data from the form
                    $title = SomeRequest::getString('title', '', 'post');
                    if ($title != '') {
                        $note = SomeRow::getRow('note');
                        $note->id = $note_id;
                        $note->title = $title;
                        $note->game_id = $id;
                        $note->body = SomeRequest::getString('body', '', 'post', 4);
                        $note->secret = SomeRequest::getString('secret', 'off', 'post');
                        $note->secret = ($note->secret == 'on') ? 'TRUE' : 'FALSE';
                        $note->tags = SomeRequest::getString('tags', '', 'post');
                        $note->image = $note_image;

                        if (is_null($note_id)) {
                            if (!is_null($note->create())) {
                                $view->note_title = $title;
                                $view->notification = true;
                            }
                        }
                        else {
                            if ($note->update()) {
                                $view->note_title = $title;
                                $view->notification = true;
                                $view->note_title = $note->title;
                                $view->note_body = $note->body;
                                $view->note_secret = $note->secret;
                                $view->note_tags = $note->tags;
                            }
                        }
                    }

                    $view->display('default');
                }
            }
            
        }
        
        
        
        
        public function deletegame() {
            
            $id = SomeRequest::getInt('id', -1);
            
            if (RBAC::hasAccess('delete', $id)) {
            
                $view = $this->getView('deletegame');

                // Delete the game if the id is specified
                if ($id != -1) {
                    $game = SomeRow::getRow('game');
                    $game->id = $id;
                    if ($game->read()) {

                        $confirmed = false;
                        if (SomeRequest::getInt('confirm', -1) == 1) {
                            $note = SomeRow::getRow('note');
                            $notes = $note->browse(array('game_id' => $id));
                            if (is_array($notes)) {
                                foreach ($notes as $row) {
                                    if (!is_null($row->image)) {
                                        unlink("./content/notemanager/images/".$row->image);
                                        unlink("./content/notemanager/images/thumbnails/".$row->image);
                                    }
                                    $row->delete();
                                }
                            }
                            $game->delete();

                            $confirmed = true;
                        }


                    }
                }

                // The view contains the notification and confirmation window, the page below those is displayed separately
                $view->game_id = $game->id;
                $view->game_name = $game->name;
                $view->delete_confirmed = $confirmed;
                $view->display('default');

                if (!$confirmed) {
                    $view = $this->getView('game');
                    $view->id = $game->id;
                }
                else {
                    $view = $this->getView('games');
                }
                $view->display('default');
            }
        }
        
        
        
        
        
        public function deletenote() {
            
            $id = SomeRequest::getInt('id', -1);
            
            if (RBAC::hasAccess('edit', $id)) {

                $view = $this->getView('deletenote');

                // Delete the note if the id is specified
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


                $view->note_id = $note->id;
                $view->game_id = $note->game_id;
                $view->note_title = $note->title;
                $view->delete_confirmed = $confirmed;

                // The view contains the notification and confirmation window, the page below those is displayed separately
                $view->display('default');
                $view = $this->getView('game');
                $view->id = $note->game_id;
                $view->display('default');
            }
        }
        
	
	public function display() {
            if (RBAC::hasAccess('read')) {
                $view = $this->getView('games');
                $view->display('default');
            }
	}
        
        
        public function game() {
            $id = SomeRequest::getInt('id');
            if (RBAC::hasAccess('read', $id)) {
                $view = $this->getView('game');
                $view->id = $id;

                $view->display('default');
            }
        }
        
        
        public function image() {
            $note_id = SomeRequest::getInt('note_id');
            $note = SomeRow::getRow('note');
            $note->id = $note_id;
            $note->read();
 
            $game = SomeRow::getRow('game');
            $game->id = $note->game_id;
            $game->read();
            
            $view = $this->getView('image');
            $view->note_id = $note->id;
            $view->note_title = $note->title;
            $view->game_id = $game->id;
            $view->game_name = $game->name;
            $view->image_url = $note->image;
            
            
            if (RBAC::hasAccess('edit', $game->id)) {
            

                // File upload
                $file = SomeRequest::getVar('imagefile_' . $note->id, null, 'files');
                if (!is_null($file)) {
                    if (is_uploaded_file($file['tmp_name'])) {

                        $valid = false;

                        // Images have a size limit of half a megabyte
                        if (0 < $file['size'] && $file['size'] <= 524288) {

                            // Only JPG, GIF and PNG -files are allowed
                            $image_type = exif_imagetype($file['tmp_name']);
                            if ($image_type != FALSE && $image_type < 4) {

                                $suffix = '.gif';
                                if ($image_type == 2) {
                                    $suffix = '.jpg';
                                } else if ($image_type == 3) {
                                    $suffix = '.png';
                                }

                                $new_name = ''.$note_id.$suffix;
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




                                    $view->image_url = $new_name;
                                    $view->notification = true;
                                    $valid = true;
                                } 

                            }
                        }


                        // Invalid image file
                        if (!$valid) {
                            unlink($file['tmp_name']);
                            $view->notification = false;
                        }
                    }
                }
            }
                
            if (RBAC::hasAccess('read', $game->id)) {
            
                $view->display('default');
            }
        }
        
        
        public function setsecret() {
            $id = SomeRequest::getInt('id', null);
            $secret = SomeRequest::getString('secret', null);

            if (!(is_null($id) || is_null($secret))) {
                $note = SomeRow::getRow('note');
                $note->id = $id;

                if ($note->read()) {
                    
                    if (RBAC::hasAccess('edit', $note->game_id)) {
                        $note->secret = ($secret == 'true') ? 'TRUE' : 'FALSE';
                        $note->update();
                    }
                }
            }
            
            
        }
        
        
        
        
        //TODO: remove function
        public function test() {
           
            if (RBAC::hasAccess('edit', 1)) {
                echo "CAN READ ALL!";
            }
            
            else {
                echo "CAN'T READ!";
            }
                    
            
        }
	
}