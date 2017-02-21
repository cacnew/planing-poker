<?php

class RoundAPITest extends EntityAPITest
{

    protected function setUp()
    {
        parent::setUp();
        $this->uri = 'api/round/';
        $this->entity = App\Entities\Round::class;
    }
}