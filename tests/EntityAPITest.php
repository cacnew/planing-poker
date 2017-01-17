<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

abstract class EntityAPITest extends TestCase
{
    use DatabaseTransactions;

    protected $entityData;
    protected $uri;
    private $testKey;


    protected function setUp()
    {
        parent::setUp();
        $this->testKey = array_keys($this->entityData)[0];
    }

    public function testCriarEntity()
    {
        $this->post($this->uri, $this->entityData);

        $this->seeJsonContains([
                $this->testKey => $this->entityData[$this->testKey],
            ]);
    }

    public function testListarEntity()
    {
        $this->get($this->uri);

        $this->seeJsonStructure(['data']);
    }

    public function testRecuperarEntity()
    {
        $entity = $this->createEntity($this->entityData);

        $this->get($this->uri.$entity->id);

        $this->seeJsonContains([
                $this->testKey => $this->entityData[$this->testKey],
            ]);
    }

    public function testApagarEntity()
    {
        $entity = $this->createEntity($this->entityData);

        $this->delete($this->uri.$entity->id);

        $this->seeJsonContains([
                'deleted' => true,
            ]);
    }

    public function testEditarEntity()
    {
        $entity = $this->createEntity($this->entityData);

        $data = [
            $this->testKey => $this->entityData[$this->testKey].'_MODIFICADO',
        ];

        $this->put($this->uri.$entity->id, $data);

        $this->seeJsonContains([
                $this->testKey => $this->entityData[$this->testKey].'_MODIFICADO',
            ]);
    }

    private function createEntity($data) {
        return json_decode($this->call('POST', $this->uri, $data)->getContent())->data;;
    }

}