<?php
class Bank {
    private $nnp;
    private $adr;
    private $rck;
    private $namen;
    private $namep;
    private $newnum;
    private $ksnp;


    public function setNnp($a)
    {
        $this->nnp = $this->handleNull($a);

    }

    public function setAdr($a)
    {
        $this->adr = $this->handleNull($a);

    }

    public function setRck($a)
    {
        $this->rck = $this->handleInt($a);

    }

    public function setNamep($a)
    {
        $this->namep = $this->handleNull($a);
        preg_match('/"(.*)"/', $this->namep, $res);
        if(!empty($res))
            $this->namen = "'".$res[1]."'";
        else
            $this->namen = $this->namep;
    }

    public function setNewnum($a)                     //bik
    {
        $this->newnum = $this->handleInt($a);

    }

    public function setKsnp($a)
    {
        $this->ksnp = $this->handleNull($a);

    }

    public function handleNull($a)
    {
        if($a == NULL)
            return "NULL";
        return "'".$a."'";
    }

    private function handleInt($a)
    {
        if(ctype_digit($a+0) === true)
            return $a;
        return "NULL";
    }

    public function toSql()
    {
        return "INSERT INTO bnkseek (NNP, ADR, RKC, NAMEN, NAMEP, NEWNUM, KSNP)
                    VALUES ($this->nnp, $this->adr, $this->rck, $this->namen, $this->namep, $this->newnum, $this->ksnp);";
    }
}