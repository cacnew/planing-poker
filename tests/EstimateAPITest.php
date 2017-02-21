<?php

class EstimateAPITest extends EntityAPITest
{

    protected function setUp()
    {
        parent::setUp();
        $this->uri = 'api/estimate/';
        $this->entity = App\Entities\Estimate::class;
    }

}