<?php
class Parser{
    private $reader;

    public function __construct($filename){

        $reader = new XMLReader();
        $reader->open($filename);

        while ($reader->name !== 'BICDirectoryEntry'){
            $reader->read();
        }
        $this->reader = $reader;
    }

    public function parseNext(){
        if ($this->reader->name === 'BICDirectoryEntry')
        {
            $bank = new Bank();
            $node = new SimpleXMLElement($this->reader->readOuterXML());
            $result = $this->parseString($bank, $node);
            $this->reader->next('BICDirectoryEntry');
            return $result;
        }
        return -1;
    }

    private function parseString($bank, $node){

        $bank->setNewnum($node["BIC"]);
        $bank->setNnp($node->ParticipantInfo["Nnp"]);
        $bank->setAdr($node->ParticipantInfo["Adr"]);
        $bank->setNamep($node->ParticipantInfo["NameP"]);
        $bank->setKsnp($node->Accounts["Account"]);
        $bank->setRck($node->Accounts["AccountCBRBIC"]);

        return $bank->toSql();
    }

}