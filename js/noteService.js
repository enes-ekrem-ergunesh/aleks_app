var NoteService = {

  init: function(){
    $("#addNoteForm").validate({
      submitHandler: function(form) {
        var entity = Object.fromEntries((new FormData(form)).entries());
        console.log(entity);
        NoteService.add(entity);
      }
     });
  },

  get: function () {
    $.ajax({
      url: 'rest/notes',
      type: 'GET',
      success: function (result) {
        console.log(result);
        // do something with the result
        // $('#note_title').html(result[0].name);
        // $('#note_description').html(result[0].desc);

        var html = "";
        for (var i = 0; i < result.length; i++) {
          html += `
    
            <!-- note card -->
            <div class="col-sm-6 col-md-4 col-lg-3 my-3">
              <div class="card">
                <div class="card-body">
                  <h5 id="note_title" class="card-title">`+ result[i].name + `</h5>
                  <p id="note_description" class="card-text">`+ result[i].desc + `</p>
                  <div class="row">
                    <div class="col text-end">
                      <div class="btn-group" role="group" aria-label="Basic mixed styles example" style="">
                        <button type="button" class="btn btn-warning">Edit</button>
                        <button onclick="NoteService.delete(`+ result[i].id + `);" class="btn btn-danger">Delete</button>
                      </div>                  
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- note card -->

          `;
        }
        $('#notes').html(html);

      },
      error: function () {
        console.log("something went wrong");
      }
    });
  },

  add: function (entity){    
    $.ajax({
      url: 'rest/notes',
      type: 'POST',
      data: JSON.stringify(entity),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        console.log(result);
      },
      error: function () {
        console.log("something went wrong");
      }
    });
  },

  delete: function (id) {

    $.ajax({
      url: 'rest/notes/'+id,
      type: 'DELETE',
      success: function (result) {
        console.log(result);
        // if deletion is successful, you can refresh the page,
        // window.location.href = './';
        // but for performance, you can just recall the get method
        NoteService.get();

      },
      error: function () {
        console.log("something went wrong");
      }
    });
  },



}