<?php

class GameAPITest extends EntityAPITest
{

    protected function setUp()
    {
        parent::setUp();
        $this->uri = 'api/game/';
        $this->entity = App\Entities\Game::class;
    }
}