<?php
class Tuition {
    public $studentName;
    public $yearLevel;
    public $totalUnits;
    public $chooseLab;
    public $totalPrice; 

    public function setValues($studentName, $yearLevel, $totalUnits, $chooseLab, $totalPrice) {
        $this->studentName = $studentName;
        $this->yearLevel = $yearLevel;
        $this->totalUnits = $totalUnits;
        $this->chooseLab = $chooseLab;
        $this->totalPrice = $totalPrice;
    }

    public function calculateTuition() {
        $baseFees = [
            1 => 550,
            2 => 630,
            3 => 470,
            4 => 501
        ];

        $additionalFees = [
            1 => 3359,
            2 => 4000,
            3 => 2890,
            4 => 3555
        ];

        // Yearly level * no of units
        if (isset($baseFees[$this->yearLevel])) {
            $this->totalPrice = $baseFees[$this->yearLevel] * $this->totalUnits;

            // additional fee with lab
            if ($this->chooseLab && isset($additionalFees[$this->yearLevel])) {
                $this->totalPrice += $additionalFees[$this->yearLevel];
            }

            return $this->totalPrice;
        } else {
            return "invalid";
        }
    }

    public function displayTuition() {
        echo "Student Name: " . $this->studentName . "<br>";
        echo "Year Level: " . $this->yearLevel . "<br>";
        echo "No. of units: " . $this->totalUnits . "<br>";
        echo "Total Price: " . $this->totalPrice . "<br>";
    }
}

$student = new Tuition();
$student->setValues($studentName, $yearLevel, $totalUnits, $chooseLab, $totalPrice);

$student->calculateTuition();

?>
