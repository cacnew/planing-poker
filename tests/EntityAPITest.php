<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

abstract class EntityAPITest extends TestCase
{
    use DatabaseTransactions;

    protected $uri;
    protected $entity;

    public function testCriarEntity()
    {
        $data = $this->getEntityData();
        $this->post($this->uri, $data);
        for($i = 0; $i < count($data); $i++) {
            $key = array_keys($data)[$i];
            if (!is_object($data[$key])) {
                $this->seeJsonContains([
                    $key => $data[$key],
                ]);
            }
        }
    }

    public function testListarEntity()
    {
        $this->get($this->uri);

        $this->seeJsonStructure(['data']);
    }

    public function testRecuperarEntity()
    {
        $data = $this->getEntityData();
        $entity = $this->createEntity($data);

        $this->get($this->uri.$entity->id);

        for($i = 0; $i < count($data); $i++) {
            $key = array_keys($data)[$i];
            if (!is_object($data[$key])) {
                $this->seeJsonContains([
                    $key => $data[$key],
                ]);
            }
        }
    }

    public function testApagarEntity()
    {
        $data = $this->getEntityData();
        $entity = $this->createEntity($data);

        $this->delete($this->uri.$entity->id);

        $this->seeJsonContains([
                'deleted' => true,
            ]);
    }

    public function testEditarEntity()
    {
        $data = $this->getEntityData();
        $entity = $this->createEntity($data);

        $dataModified = $this->getEntityData();

        $this->put($this->uri.$entity->id, $dataModified);

        for($i = 0; $i < count($data); $i++) {
            $key = array_keys($data)[$i];
            if (!is_object($data[$key])) {
                $this->seeJsonContains([
                    $key => $dataModified[$key],
                ]);
            }
        }
    }

    private function createEntity($data) {
        return json_decode($this->call('POST', $this->uri, $data)->getContent())->data;
    }

    private function getEntityData() {
        return factory($this->entity)->make()->toArray();
    }
}