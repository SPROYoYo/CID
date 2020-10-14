<?php
include 'CID.php';

# this will be the last ID used in your project.
$last_id = "srfl7PnoaQE";

# this function will generate a new fresh ID
echo CID::NEW($last_id); 

# The new ID generated will be: srfl7PnoaQF


# If the generated IDs will reach the maximum point of combinations (ZZZZZ...) it will add a new bit at the string:
# e.g: ZZX -> ZZZ -> 0000 -> 0001 ....
?>
