<?php
class CarPolicy {
    private $policyNumber;
    private $yearlyPremium;
    private $dateOfLastClaim;
    private $discount;

    public function __construct($PN, $premium) {
        $this->policyNumber = $PN;
        $this->yearlyPremium = $premium;
    }

    public function setDateOfLastClaim($dateOfLastClaim) {
        $this->dateOfLastClaim = $dateOfLastClaim;
    }

    public function getTotalYearsNoClaims()
{
     $currentDate = new DateTime();
     $lastDate= new DateTime($this->dateOfLastClaim);
     $interval = $currentDate->diff($lastDate);
     return $interval->format("%y");
}


public function __toString() {
    return "PN:" . $this->policyNumber;
}

    public function getDiscount() {
        $years = $this->getTotalYearsNoClaims();
        if ($years >= 3 and $years <= 5 ) {
            $this->discount=10;
        }            
        elseif($years > 5)
            {
                $this->discount=15;
            }
        else {
            $this->discount = 0;
        }
        return $this->discount;

    }
    public function getDiscountedPremium()
{
    $discount = $this->getDiscount();

    return $this->yearlyPremium -
           ($this->yearlyPremium * ($discount / 100));
}
}

?>