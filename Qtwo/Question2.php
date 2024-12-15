<?php
function findPair($nums, $target) {
    // Create an empty hash map
    $seen = [];
    $found = false;

    // Iterate through the array
    foreach ($nums as $num) {
        $complement = $target - $num;

        // Check if the complement exists in the hash map
        if (array_key_exists($complement, $seen)) {
            echo "Pair found ($complement, $num)\n";
            $found = true;
            return; // Return after finding the first pair
        }

        $seen[$num] = true;
    }

    // If no pair is found, print the following
    if (!$found) {
        echo "Pair not found\n";
    }
}

// Test cases
$nums1 = [8, 7, 2, 5, 3, 1];
$target1 = 10;
echo "Input: ";
print_r($nums1);
echo "Target: $target1\n";
findPair($nums1, $target1);

echo "\n";

$nums2 = [5, 2, 6, 8, 1, 9];
$target2 = 12;
echo "Input: ";
print_r($nums2);
echo "Target: $target2\n";
findPair($nums2, $target2);
?>
