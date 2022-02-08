$(document).ready(function($) {

    function postData(a) {
      $('#addStudent').submit(function(event) {
        event.preventDefault();
        // console.log($(this).serialize());
        $.ajax({
          url: a,
          type:'POST',
          dataType:'json',
          data:$(this).serialize(),
        })
        .done(function (response) {
            alert(response.message);
            window.location.reload();
        })
        .fail(function (error) {
          console.log(error)
        })
      })
    }
    postData('../server/classes/handleRequest.php?_mode=addStudent')

    // Add admin
    function addAdmin(a) {
      $('#addAdmin').submit(function(event) {
        event.preventDefault();
        $.ajax({
          url: a,
          type:'POST',
          dataType:'json',
          data:$(this).serialize(),
        })
        .done(function (response) {
          alert(response.message)
          window.location.reload();
        })
        .fail(function (error) {
          console.log(error)
        })
      })
    }
    addAdmin('../server/classes/handleRequest.php?_mode=addAdmin');

    // Add Lecturer
    function addLecturer(a) {
      $('#addLecturer').submit(function(event) {
        event.preventDefault();
        $.ajax({
          url: a,
          type:'POST',
          dataType:'json',
          data:$(this).serialize(),
        })
        .done(function (response) {
          alert(response.message)
          window.location = "index.php?a=staff&b=lecturer";
        })
        .fail(function (error) {
          console.log(error)
        })
      })
    }
    addLecturer('../server/classes/handleRequest.php?_mode=addLecturer');

    // Course registration by admin
    $('#addCourse').submit(function(event) {
      event.preventDefault();
      $.ajax({
        url : '../server/classes/handleRequest.php?_mode=addCourse',
        type: "POST",
        data :  $(this).serialize(),
        dataType : 'json',
        success: function (response) {
          alert(response.message)
          window.location.reload();
        },
        error: function (response) {
          console.log(response)
        }
      })
    })

    // student login
    function sLogin(a) {
      $('#slogin').submit(function(event) {
        event.preventDefault();
        $.ajax({
          url: a,
          type:'POST',
          dataType:'json',
          data:$(this).serialize(),
        })
        .done(function (response) {
          alert(response.message)
          window.location = "student/index.php";
        })
        .fail(function (error) {
          console.log(error)
        })
      })
    }
    sLogin('server/classes/handleRequest.php?_mode=slgoin');

    // admin login
    function adminLogin(a) {
      $('#adminLogin').submit(function(event) {
        event.preventDefault();
        $.ajax({
          url: a,
          type:'POST',
          dataType:'json',
          data:$(this).serialize(),
        })
        .done(function (response) {
          alert(response.message)
          window.location = "index.php";
        })
        .fail(function (error) {
          console.log(error)
        })
      })
    }
    adminLogin('../server/classes/handleRequest.php?_mode=adminLogin');

    // lecturer login
    function lecturerLogin(a) {
      $('#lecturerLogin').submit(function(event) {
        event.preventDefault();
        $.ajax({
          url: a,
          type:'POST',
          dataType:'json',
          data:$(this).serialize(),
        })
        .done(function (response) {
          alert(response.message)
          window.location = "index.php";
        })
        .fail(function (error) {
          console.log(error)
        })
      })
    }
    lecturerLogin('../server/classes/handleRequest.php?_mode=lecturerLogin');

    
    // fetch exam year id
      $('#examnam').on('change', function() {
        let val = $(this).val();
        console.log(val)
        $.ajax({
          url: `ajax.php?examname=${val}`,
          type:'GET',
          dataType:'json',
        })
        .done(function (response) {
          console.log(response.message)
        })
        .fail(function (error) {
          console.log(error)
        })
      })

   

})
