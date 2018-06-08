<?php
function debug_out($data) {
    $output = $data;
    if(is_array($output)){
        $output = implode(',', $output);
    }
    echo "<script>console.log('Dbg: ".$output."');</script>";
}

function debug_json($object=null, $label=null ){
    $message = json_encode($object, JSON_PRETTY_PRINT);
    $label = "Dbg".($label ? " ($label): " : ': ');
    echo "<script>console.log(\"$label\", $message);</script>";
}

?>