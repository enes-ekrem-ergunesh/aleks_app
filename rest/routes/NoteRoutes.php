<?php

Flight::route('GET /notes', function(){
  Flight::json(Flight::noteDao()->get_all());
});

Flight::route('DELETE /notes/@id', function($id){
  Flight::json(Flight::noteDao()->delete($id));
});

?>
