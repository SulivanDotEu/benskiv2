/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$().ready(function() {
   console.log("test");
   $(".hidden-content").hide();
   $(".show-hover-content").on({
      mouseover: function() {
         console.log('mouseover');
         $(this).children('.hidden-content').show();
      },
    
      mouseout: function() {
         console.log('mouseout');
         $(this).children('.hidden-content').hide();
      }
   });
});
                     