
function newsFetchForMain(){
//Haberler
$.ajax({
    type: "GET",
    url: "http://localhost/api/news/getnews?page=1",
    dataType:"json",
    //data: dataString,
    success: function (response) {
        if(response.result === true) {  
        response.data.news.map((item) => {
            string = `
                <div class="col-3 mt-5">
                    <div class="card" style="width: 18rem;">
                        <img src="${item.img}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">${item.title.substring(0,45)+"..."}</p>
                        <a class="btn btn-primary" href="/main/detail/newdetail?id=${item.id}">Devamını Oku</a>
                    </div>
                    </div>
                </div>`;
                $("#news").append(string);

        });

        string = "";

        for (let i=0; i<3; i++)
        {
            string += `
            <div class="carousel-item ${i == 0 ? 'active' : ''}">
                <a href="/main/detail/newdetail?id=${response.data.news[i].id}">
                    <img src="${response.data.news[i].img}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <p>${response.data.news[i].title.substring(0,40)+"..."}</p>
                    </div>
                </a>
            </div>
            `
        }
            
        
        $("#inner").append(string);

        } else if(response.result === false) {
            
            $("#news").append("Gösterilecek haber bulunamadı..");
        }
    }
})
}


