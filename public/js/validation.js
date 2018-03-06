
function validFile(iFile, k) {
   var fName = iFile.value;
   if (fName == "" || fName == false || fName == null) {
       documentpasstype.style.borderColor = "red";
       iFile.value = "";
       var parent = $('embed#docPreview' + k).parent();
       var newElement = "<embed src='img/defaultDocument.png' class='documentName' id=docPreview" + k + " width='283px' height='178px' onclick='docPreView(this)'>";
       $('embed#docPreview' + k).remove();
       parent.append(newElement);
       var documentpasstype = document.getElementById("documentpasstype" + k);


   } else {

       var extensions = new Array("pdf", "jpeg", "jpg", "png");
       for (var i = 0; i < iFile.files.length; i++) {
           var flag = 0;
           var file = iFile.files[i];
           var sz = file.size / (1024 * 1024);
           var fl = fName.length;
           var pos = fName.lastIndexOf('.') + 1;
           var ext = fName.substring(pos, fl);
           ext = ext.toLowerCase();
           for (var j = 0; j < 5; j++) {
               if (extensions[j] == ext)
                   flag = 1;
           }
           if (flag == 0) {
               alert("File should be jpg,jpeg,png,pdf!!");
               var parent = $('embed#docPreview' + k).parent();
               var newElement = "<embed src='img/defaultDocument.png' class='documentName' id=docPreview" + k + " width='283px' height='178px' onclick='docPreView(this)'>";

               $('embed#docPreview' + k).remove();
               parent.append(newElement);
               iFile.value = "";
               var documentpasstype = document.getElementById("documentpasstype" + k);
               documentpasstype.style.borderColor = "red";
           } else if (sz >= 2) {
               alert("File size should be < 2MB");
               iFile.value = "";
               var parent = $('embed#docPreview' + k).parent();
               var newElement = "<embed src='img/defaultDocument.png' class='documentName' id=docPreview" + k + " width='283px' height='178px' onclick='docPreView(this)'>";

               $('embed#docPreview' + k).remove();
               parent.append(newElement);
               var documentpasstype = document.getElementById("documentpasstype" + k);
               documentpasstype.style.borderColor = "red";
           } else {

               if (iFile.files && iFile.files[0]) {
                   var reader = new FileReader();

                   reader.onload = function (e) {
                       var parent = $('embed#docPreview' + k).parent();
                       var newElement = "<embed src='" + e.target.result + "'id=docPreview" + k + " class='documentName' width='283px' height='178px' onclick='docPreView(this)'>";

                       $('embed#docPreview' + k).remove();
                       parent.append(newElement);
                   };

                   reader.readAsDataURL(iFile.files[0]);
                   var documentpasstype = document.getElementById("documentpasstype" + k);
                   documentpasstype.style.borderColor = "#ccc";
               }
           }
       }
   }
}




function validImg(iFile) {
   var fName = iFile.value;
   var extensions = new Array("jpeg", "jpg", "png");
   for (var i = 0; i < iFile.files.length; i++) {
       var flag = 0;
       var file = iFile.files[i];
       var sz = file.size / (1024 * 1024);
       var fl = fName.length;
       var pos = fName.lastIndexOf('.') + 1;
       var ext = fName.substring(pos, fl);
       ext = ext.toLowerCase();
       for (var j = 0; j < 5; j++) {
           if (extensions[j] == ext)
               flag = 1;
       }
       if (flag == 0) {
           alert("File should be jpg,jpeg,png!!");
           iFile.value = "";
           var ApplicantPhoto = document.getElementById("ApplicantPhoto");
           ApplicantPhoto.style.color = "red";
           document.getElementById("image").src = "img/defaultProfile.jpg";
       } else if (sz >= 2) {
           alert("File size should be < 2MB");
           iFile.value = "";
           var ApplicantPhoto = document.getElementById("ApplicantPhoto");
           ApplicantPhoto.style.color = "red";

       } else {
           var ApplicantPhoto = document.getElementById("ApplicantPhoto");
           ApplicantPhoto.style.color = "#333";
           if (iFile.files && iFile.files[0]) {
               var reader = new FileReader();

               reader.onload = function (e) {
                   $('#image')
                           .attr('src', e.target.result)

               };

               reader.readAsDataURL(iFile.files[0]);
           }
       }
   }

}


$("#example1 th:last-child").addClass("sort");
