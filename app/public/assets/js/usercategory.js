function userCategory(){
    //Kategoriler
    const token = localStorage.getItem("user-token");

    $.ajax({
        type: "GET",
        url: "http://localhost/api/categories/getrelatedcategories?token="+token,
        dataType:"json",
        //data: dataString,
        success: function (response) {
            if(response.result === true) {  
            response.data.categories.map((item) => {
                string = `           
                            <div class="row mt-3 justify-content-center">
                            <div class="col-3 mt-1">
                            <label class="form-check-label mt-2" for="flexCheckDefault">
                                    ${item.category}:
                            </label>
                            </div>
                            <div class="col-6">    
                                <input class="form-check-input mt-3" type="checkbox" ${item.check ? 'checked': ''} value="${item.id}" id="flexCheckDefault" name="category">
                            </div>   
                            </div>
                        `;
                    $("#cat").append(string);
            });
                } 
                else if(response.result === false) { 
                    $("#cat").append("Gösterilecek kategori bulunamadı..");
                }
            }
        })
    }

    function saveCategories(){
        let catArr= Array();
        let itemCount=0;
        $("input:checkbox[name=category]:checked").each(function(){
            catArr.push($(this).val());
            itemCount++;
            if($("input:checkbox[name=category]:checked").length === itemCount){
                saveAPI(catArr);
            }
        });

    }

    function saveAPI(data){

        value = {"relatedCategory" : data};
        const token = localStorage.getItem("user-token");
        $.ajax({
            type: "POST",
            url: "http://localhost/api/user/relatedcategory?token="+token,
            dataType:"json",
            data: value,
            success: function (response) {
                console.log(data)
                if(response.result === true) {  
                    if (document.getElementById("alert") != null)
                    {
                        document.getElementById("alert").remove();
                    }
                        message =  `<div class="alert alert-success" role="alert" id="alert">Kategoriler başarı ile güncelendi..</div>`;
                    $("#message").append(message);
                } 
                else if(response.result === false) { 
                        $("#message").append("Bir hata oluştu..");
                }
                }
            })
    }


    $(document).ready(function(){
        userCategory();
    })
    