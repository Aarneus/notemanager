<?php
someloader('some.application.model');

class SomeModelGame extends SomeModel {

    public $id = -1;
    public $name = '';
    
    public $game = null;
    public $notes = null;
    public $owners = null;
    
    public $games = null;
    
    public $notification = false;
    public $delete_confirmed = false;
    
    
    public function __construct(array $options=array()) {
        parent::__construct($options);
    }
    
    
    /**
     * Creates a new game if receiving proper data from the form
     */
    public function createGame() {
        
        $name = SomeRequest::getString('name', '', 'post');
        
        $already_exists = false;
        $this->getGames();
        foreach ($this->games as $game) {
            if ($game->name == $name) {
                $already_exists = true;
                break;
            }
        }
        
        if ($name != '' && !$already_exists) {
            $game = SomeRow::getRow('game');
            $game->name = $name;
            
            
            if (!is_null($game->create())) {
                $this->id = $game->id;
                $this->name = $game->name;
                $this->notification = true;
                
                $owner = SomeRow::getRow('owner');
                $owner->game_id = $game->id;
                $owner->user_id = SomeFactory::getUser()->getId();
                $owner->create();
            }
        }
    }
    
    
    
    /**
     * Deletes the game if the id is specified
     */
    public function deleteGame($id) {
        
        if ($id != -1) {
            $game = SomeRow::getRow('game');
            $game->id = $id;
            if ($game->read()) {

                $confirmed = false;
                if (SomeRequest::getInt('confirm', -1) == 1) {
                    $note = SomeRow::getRow('note');
                    $notes = SELECT::from('note', array('game_id' => $id));
                    if (is_array($notes)) {
                        foreach ($notes as $row) {
                            if (!is_null($row->image)) {
                                unlink("./content/notemanager/images/".$row->image);
                                unlink("./content/notemanager/images/thumbnails/".$row->image);
                            }
                            $row->delete();
                        }
                    }

                    $owners = SELECT::from('owner', array('game_id' => $game->id));
                    foreach ($owners as $owner) {
                        $owner->delete();
                    }

                    $game->delete();

                    $confirmed = true;
                }


            }
        }

        // The view contains the notification and confirmation window, the page below those is displayed separately
        $this->id = $game->id;
        $this->name = $game->name;
        $this->delete_confirmed = $confirmed;
        
        return $confirmed;
    }
    
    
    
    
    /**
     * Retrieves game data from the database
     */
    public function getGameData($id) {
        $gamerow = SomeRow::getRow('game');
        $gamerow->id = $id;

        $this->game = null;
        $this->notes = null;
        if ($gamerow->read()) {
            $this->game = $gamerow;

            $this->notes = SELECT::from('note', array('game_id' => $id));

            $owners = SELECT::from('owner', array('game_id' => $id));
            if (is_array($owners)) {
                foreach ($owners as $owner) {
                    $user = SomeRow::getRow('user');
                    $user->id = $owner->user_id;
                    $user->read();
                    $this->owners[$user->id] = $user->username;
                }
            }
        }
    
    }
    
    
    
    /**
     * Gets a list of all games in the database
     */
    public function getGames() {
        $this->games = SELECT::from('game');
    }
}