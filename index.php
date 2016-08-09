<?php
class Address
{
    private $_country;

    public function __construct($country)
    {
        $this->_country = $country;
    }

    public function getCountry()
    {
        return $this->_country;
    }
}

class Customer
{
    private $_name;
    private $_address;

    public function __construct($name, $country)
    {
        $this->_name = $name;
        $this->_address = new Address($country);
    }

    public function getName()
    {
        return $this->_name();
    }

    public function getAddress()
    {
        return $this->_address();
    }
}
?>