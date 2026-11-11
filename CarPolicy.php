<?php
class CarPolicy {
    private $policyNumber;
    private $yearlyPremium;
    private $dateOfLastClaim;

    public function __construct($PN, $premium) {
        $this->policyNumber = $PN;
        $this->yearlyPremium = $premium;
    }

    public function setDateOfLastClaim($dateOfLastClaim) {
        $this->setDateOfLastClaim = $dateOfLastClaim;
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
}

?>