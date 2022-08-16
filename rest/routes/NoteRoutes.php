<?php

// GET all notes
Flight::route('GET /notes', function(){
  Flight::json(Flight::noteDao()->get_all());
});

// GET single note
Flight::route('GET /notes/@id', function($id){
  Flight::json(Flight::noteDao()->get_by_id($id));
});

// ADD single note
Flight::route('POST /notes/@id', function($id){
  Flight::json(Flight::noteDao()->add($id));
});

// UPDATE single note
Flight::route('PUT /notes/@id', function($id){
  Flight::json(Flight::noteDao()->update($id));
});

// DELETE single note
Flight::route('DELETE /notes/@id', function($id){
  Flight::json(Flight::noteDao()->delete($id));
});



?>
