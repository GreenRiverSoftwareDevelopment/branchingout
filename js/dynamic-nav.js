$(document).ready(function()
{
   if ($(location).attr('pathname') == '/') {
        $('#home-link').addClass('current');
   }
   
   if ($(location).attr('pathname') == '/post-job') {
        $('#post-link').addClass('current');
   }
   
   if ($(location).attr('pathname') == '/announcements') {
        $('#annoucement-link').addClass('current');
   }   
});