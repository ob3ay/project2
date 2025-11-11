
// document.querySelectorAll('[data-target]').forEach(el=>{
//     el.onclick=(e)=>{
//         e.preventDefault();
//         let target = el.dataset.target

//         document.querySelector("#"+target).classList.remove('hidden');
//     };
// });
document.querySelector(".add-new-coures").onclick=(e)=>{

e.preventDefault();
document.querySelector("#add-new-coures form").reset();
document.querySelector(".alert-error").classList.add('hidden');
document.querySelector("#add-new-coures").classList.remove('hidden');
};
document.querySelectorAll('.close').forEach(el=>{
    el.onclick=()=>{
        el.closest('.modal').classList.add('hidden');

    }
    });
    document.querySelectorAll('.modal').forEach(el=>{
    el.onclick=(e)=>{
        el.classList.add('hidden');
    }
});
document.querySelectorAll('.modal .content').forEach(el=>{
    el.onclick=(e)=>e.stopPropagation();
});
document.querySelector("#add-new-coures form").onsubmit=(e)=>{
    e.preventDefault();
    let form =document.querySelector("#add-new-coures form");
    let url=form.action;
    let data = new FormData(form);
    axios.post(url,data)
    .then((res)=>{
        document.querySelector("#add-new-coures").classList.add('hidden');
        document.querySelector(".table-conetent").innerHTML=res.data.data;
        document.querySelector(".count").innerHTML++;
        Swal.fire({
            title: "Good job!",
            text: res.data.msg,
            icon: "success"
        });
    })
    .catch((err)=>{
        if(err.response.status==422){
        let error_message="";
        for(error in err.response.data.errors){
            error_message+=`<p>${err.response.data.errors[error][0]}</p>`;
        }
        document.querySelector(".alert-error").innerHTML=error_message;
        document.querySelector(".alert-error").classList.remove('hidden');
    }
    });
};
//pagination
document.querySelector(".table-conetent ").onclick=(e)=>{
    let link = e.target.closest("a");
    if(link&&link.closest("div.pagination")){
        e.preventDefault();
        let url=link.href;
        axios.get(url)
        .then((res)=>{
            document.querySelector(".table-conetent").innerHTML=res.data.data;
        }
        )
        .catch((err)=>{
            console.log(err);
            });
    }
    //edit coures model
    if(link.classList.contains('edit-row')){
        e.preventDefault();
        let target = link.dataset.target;
        document.querySelector('#'+target).classList.remove('hidden');
        //get coures data
        let tilte=document.querySelector(`#${target} #title`);
        let form=document.querySelector(`#${target} form`);
        let img=document.querySelector(`#${target} .img-wrapper img`);
        let description=document.querySelector(`#${target} #description`);
        let price=document.querySelector(`#${target} #price`);
        let category=document.querySelector(`#${target} #category`);
        let url=link.href;
        axios.get(url)
        .then((res)=>{
            if(res.status==200){
                tilte.value=res.data.data.title;
                img.src="http://localhost:8000/"+res.data.data.image;
                description.value=res.data.data.description;
                price.value=res.data.data.price;
                category.value=res.data.data.category;
                form.action="/courses/"+res.data.data.id;
            }
        })
        .catch((err)=>{
            console.log(err);
        });
        form.onsubmit=(e)=>{
            e.preventDefault();
            let url=form.action;
            let data = new FormData(form);
            axios.post(url,data)
            .then((res)=>{
                document.querySelector("#edit-coures").classList.add('hidden');
                document.querySelector(".table-conetent").innerHTML=res.data.data;
                Swal.fire({
                    title: "Good job!",
                    text: res.data.msg,
                    icon: "success"
                });

            })
            .catch((err)=>{
                if(err.response.status==422){
                let error_message="";
                for(error in err.response.data.errors){
                    error_message+=`<p>${err.response.data.errors[error][0]}</p>`;
                }
                document.querySelector(".alert-error").innerHTML=error_message;
                document.querySelector(".alert-error").classList.remove('hidden');
            }
            });
    }}
};
//search
function filter(e){
e.preventDefault();
let searchInput = document.querySelector("[name=search]");
let orderInput = document.querySelector("[name=order]");
let countInput = document.querySelector("[name=count]");
let url=window.location.href;
axios.get(url,{
    params:{
        search:searchInput.value,
        order:orderInput.value,
        count:countInput.value
    },
}).then((res)=>{
    document.querySelector(".table-conetent").innerHTML=res.data.data;
    }).catch((err)=>{
        console.log(err);
        });
}
//Delete
function deleteRow(e){
    e.preventDefault();
    let url=e.target.closest('form').action;
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
        }).then((result) => {
        if (result.isConfirmed) {
            axios.post(url,{
                _method:"delete",
            }
            ).then((res)=>{
                document.querySelector(".table-conetent").innerHTML=res.data.data;
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                    });
                    }).catch((err)=>{
                        console.log(err);
                        }
                    );
        }
        });
}
