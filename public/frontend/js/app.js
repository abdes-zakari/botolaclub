// My Javascript code devloped by Me for the application


$(document).ready(function() {
 
   if ($('#account-success-created').length){

   	// alert($("#account-success-created").text());
   	swal("Your account has been successfully created", "Please check your email to activated your account.", "success");

   }

   if ($('#account-success-confirmed').length){

   	swal("Success", "Your email address has been successfully verified.", "success");

   }
});