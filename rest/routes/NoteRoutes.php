<?php
Flight::route('GET /notes', function(){
  Flight::json(Flight::noteDao()->get_all());
});

?>
