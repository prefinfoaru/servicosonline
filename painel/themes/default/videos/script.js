/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var tvOlinda = document.getElementById('tvOlinda');

tvOlinda.addEventListener('ended', function (e) {
    // get the active source and the next video source.
    // I set it so if there's no next, it loops to the first one
    var activesource = document.querySelector("#tvOlinda source.active");
    var nextsource = document.querySelector("#tvOlinda source.active + source") || document.querySelector("#tvOlinda source:first-child");

    // deactivate current source, and activate next one
    activesource.className = "";
    nextsource.className = "active";

    // update the video source and play
    tvOlinda.src = nextsource.src;
    tvOlinda.play();
});

