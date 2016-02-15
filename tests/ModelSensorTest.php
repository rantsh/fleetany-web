<?php

class ModelSensorTest extends TestCase
{
    public function testCreate()
    {
        $this->visit('/modelsensor/create')
            ->type('Nome Sensor Teste', 'name')
            ->type('1', 'version')
            ->press('Enviar')
            ->seePageIs('/modelsensor')
        ;
        
        $this->seeInDatabase('model_sensors', ['name' => 'Nome Sensor Teste', 'version' => '1']);
    }
    
    public function testUpdate()
    {
        $this->visit('/modelsensor')
            ->click('Nome Sensor Teste')
            ->type('Nome Sensor Editado', 'name')
            ->type(2, 'version')
            ->press('Enviar')
        ;
        
        $this->seeInDatabase('model_sensors', ['name' => 'Nome Sensor Editado', 'version' => '2']);
    }
    
    public function testDelete()
    {
        $this->visit('/modelsensor')
            ->press('Excluir');
        
        $this->notSeeInDatabase('model_sensors', ['name' => 'Nome Sensor Editado', 'version' => '2']);
    }
}