// handle display image lên before user upload image lên server!
function DisPlayImage() {
  let selectImage = document.getElementById("fileUpload").files;
  if (selectImage.length > 0) {
    var fileToImage = selectImage[0];
    var fileReader = new FileReader();
    fileReader.onload = function (fileEvent) {
      var srcFile = fileEvent.target.result;
      var imageNew = document.createElement("img");
      imageNew.src = srcFile;

      document.getElementById("displayImage").innerHTML = imageNew.outerHTML;
    };
    fileReader.readAsDataURL(fileToImage);
  }
}
