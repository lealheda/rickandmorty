
function atest(image, name, species, gender, status, origin)
{
   $(".modal-title").text(name)
   $("#modal-img").attr("src", image)
   $("#modal-card-title").text(name)
   $("#modal-species").text(species)
   $("#modal-gender").text(gender)
   $("#modal-status").text(status)
   $("#modal-origin").text(origin)
   $("#myModal").modal("show")
}