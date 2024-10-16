<?php

// Function to calculate the difference in years, months, and days using DateTime
function calculateDateDifference($currentDate, $targetDate) {
    $currentDateTime = new DateTime($currentDate);
    $targetDateTime = new DateTime($targetDate);
    
    // Calculate the difference between the two dates
    $interval = $currentDateTime->diff($targetDateTime);
    
    // Return an array containing years, months, and days from the interval
    return [$interval->y, $interval->m, $interval->d];
}

// Function to check if the current date is past the expiration date
function isPastExpiration($currentDate, $expirationDate) {
    $currentDateTime = new DateTime($currentDate);
    $expirationDateTime = new DateTime($expirationDate);
    
    // Compare the two dates and return true if the current date is greater
    return $currentDateTime > $expirationDateTime;
}
