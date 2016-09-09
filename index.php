<?php
echo "<meta charset='utf-8'>";
/**
 * Class StrategyContext
 */
class StrategyContext {
    private $strategy = NULL;
    public function __construct($strategy_ind_id) {
        switch ($strategy_ind_id) {
            case "SP":
                $this->strategy = new serializeP();
                break;
            case "USP":
                $this->strategy = new unserializeP();
                break;
            case "EJP":
                $this->strategy = new jsonEncodeP();
                break;
            case "DJP":
                $this->strategy = new jsonDecodeP();
                break;
        }
    }
    public function processC($input) {
        return $this->strategy->cording($input);
    }
}

interface StrategyInterface {
    public function cording($input);
}

class serializeP implements StrategyInterface {
    public function cording($input) {
        $r = serialize($input->getVal());
        return $r;
    }
}

class unserializeP implements StrategyInterface {
    public function cording($input) {
        $r = unserialize($input->getVal());
        return $r;
    }
}

class jsonEncodeP implements StrategyInterface {
    public function cording($input) {
        $r = json_encode($input->getVal());
        return $r;
    }
}

class jsonDecodeP implements StrategyInterface {
    public function cording($input) {
        $r = json_decode($input->getVal());
        return $r;
    }
}

class mainContain {
    private $oriVal;
    
    public function __construct() {
//        $this->oriVal = $oriVal;
    }

    public function getVal() {
        return $this->oriVal;
    }

    public function setVal($oriVal) {
        $this->oriVal = $oriVal;
    }

    public function outVal($output) {
        $outVal = $output."<br>";
        echo $outVal;
    }
}


$input = new mainContain();
$input->setVal('가나다');

$a = new StrategyContext('SP');
$b = new StrategyContext('USP');
$c = new StrategyContext('EJP');
$d = new StrategyContext('DJP');

$aa = $a->processC($input);
$input->setVal($aa);
$bb = $b->processC($input);

$input->setVal('가나다라마버사');
$cc = $c->processC($input);
$input->setVal($cc);
$dd = $d->processC($input);

$input->outVal($aa);
$input->outVal($bb);
$input->outVal($cc);
$input->outVal($dd);

?>
