<?php
include("CarPolicy2.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $policyNumber = $_POST['policyNumber'];
    $yearlyPremium = $_POST['yearlyPremium'];
    $dateOfLastClaim = $_POST['dateOfLastClaim'];


    $policy = new CarPolicy($policyNumber, $yearlyPremium);
    $policy->setDateOfLastClaim($dateOfLastClaim);

    
    echo "<h1>Policy Summary</h1>";
    echo "<p>" . htmlspecialchars($policy) . "</p>";
    echo "<p>Years with No Claims: " . $policy->getTotalYearsNoClaims() . "</p>";
    echo "<p>Initial Yearly Premium: $" . number_format($yearlyPremium, 2) . "</p>";
    echo "<p>Discount Applied: $" . number_format($policy->getDiscount(), 2) . "</p>";
    echo "<p><strong>Discounted Premium: $" . number_format($policy->getDiscountedPremium(), 2) . "</strong></p>";
} else {
    echo "Invalid access method.";
}
?>