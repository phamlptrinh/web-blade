import './bootstrap';

import Alpine from 'alpinejs';
import Swal from 'sweetalert2';

window.Alpine = Alpine;
window.Swal = Swal;

Alpine.start();

/* ---------------------tabs-------------------- */
let tabLinks = document.querySelectorAll('.trinh-tabs__nav-link')//lấy hết những gì có class là trinh...
tabLinks.forEach(function (link/* ){ */, index){ //index dat o day la lay het nhung tabLinks trong trang
    link.addEventListener('click',function(e){ // viết cho đầy đủ dấu
        e.preventDefault();
        //let element = e.target;
        let thisTabGrandPa = link.parentNode.parentNode.parentNode; 
        //lấy đúng phần tab
        let tabNavItem = thisTabGrandPa.querySelectorAll('.trinh-tabs__nav-item');
        tabNavItem.forEach(function (navItem){
            navItem.classList.remove("active");//xóa active tab
        })
        link.parentNode.classList.add("active");//add active tab

        let tabNavPane = thisTabGrandPa.querySelectorAll('.trinh-tabs__pane');
        tabNavPane.forEach(function (navPane){
            navPane.classList.remove("active");//xóa active pane
        })

        //c1:
        let href = link.getAttribute("href");// trong này có #
        let tabNavPane_ac = thisTabGrandPa.querySelector(href);//lấy theo dạng selector css nên phải có # và ko all nên chỉ lấy 1 cái (theo id)
        tabNavPane_ac.classList.add("active");
        console.log(element);
        /* c1 như đang làm, cách 2 dùng cho foreach, them index, bắt buộc đúng vị trí*/
        
        //c2:
        /* let tabPane = thisTabGrandPa.querySelectorAll('.trinh-tabs__pane');
        index = index > 2 ? index - 3 : index;//Code super tough!!!!!!
        tabPane.forEach(function(pane, indexP){
            if(indexP == index){
                pane.classList.add("active");
            }
        }); */

        
    })
});
//console.log(tabLinks);

/* -------------------Accordion------------------ */

let accLinks = document.querySelectorAll('.tr-accordion__link')//lấy hết những gì có class là trinh...
accLinks.forEach(function (link){/* , index){ */ //index dat o day la lay het nhung accLinks trong trang
    link.addEventListener('click',function(e){ // viết cho đầy đủ dấu
        e.preventDefault();
        //let element = e.target;
        let thisAccItem = link.parentNode.parentNode; 

        if(thisAccItem.classList.contains('active')){
            thisAccItem.classList.remove("active");
        }
        else{
            //lấy đúng Accordion trong cac accordion
            let thisaccGrandPa = link.parentNode.parentNode.parentNode; 
            let accItem = thisaccGrandPa.querySelectorAll('.tr-accordion__item'); 
            accItem.forEach(function (Item){
                Item.classList.remove("active");
            })//neu muon giu trang thai mo thi xoa phan remove active

            //add active acc
            thisAccItem.classList.add("active");

            /* let accPane = thisaccGrandPa.querySelectorAll('.trinh-accs__pane');
            accPane.forEach(function (Pane){
                Pane.classList.remove("active");//xóa active pane
            })*/
        }
    })
});

/* -------------------Carousel------------------ */

let allCars = document.querySelectorAll(".tr-carousel");//all la tra vve mang
//console.log(sliders);
allCars.forEach(function(oneCar){
    let inner = oneCar.querySelector(".tr-carousel__inner");
    let prevBtn = oneCar.querySelector('.prev');
    let nextBtn = oneCar.querySelector('.next');
    let mang_hinh = inner.querySelectorAll(".tr-carousel__item");
    let currPage = parseInt(oneCar.dataset.currSlide);
    //let inputCurrSlide = oneCar.querySelector(".curr-slide");
    //console.log(currPage);

    prevBtn.addEventListener("click",function(e){
        let currPage = parseInt(oneCar.dataset.currSlide);
        if(currPage == 0){
            currPage = mang_hinh.length-1;
        }
        else{currPage--;}
        changeSlide(mang_hinh, currPage);
        oneCar.dataset.currSlide=currPage;
    });
    nextBtn.addEventListener("click",function(e){
        let currPage = parseInt(oneCar.dataset.currSlide);
        if(currPage == mang_hinh.length-1){
            currPage = 0;
        }       
        else{currPage++;}
        changeSlide(mang_hinh, currPage);
        oneCar.dataset.currSlide=currPage;
    });

    
});

function changeSlide(slides, page){ 
    slides.forEach(function(sl){
        sl.classList.remove("active");
    })
    slides[page].classList.add("active");
    
}

//MYYYYYYYY
/* let carControlLinks = document.querySelectorAll('.tr-carousel__control-link');
carControlLinks.forEach(function(link){
link.addEventListener('click',function(e){ // viết cho đầy đủ dấu
    e.preventDefault();
    let thisCarousel = link.parentNode.parentNode;
    //console.log(thisCarousel);
    let inner = thisCarousel.querySelector('.tr-carousel__inner');// de y dau cham cho ky
    //console.log(inner);
    let carItems = inner.querySelectorAll('.tr-carousel__item');
    let thisControl = link.parentNode;
    if(thisControl.classList.contains('prev')){// cai nay khong lay duoc prev
        if(carItems[0].classList.contains('active')){
            carItems[0].classList.remove('active');
            console.log("A");
            carItems[carItems.length-1].classList.add('active');
            console.log("B");
        }else{
            for (let i = 1; i < carItems.length; i++) {
                if(carItems[i].classList.contains('active')){
                    carItems[i].classList.remove('active');
                    console.log("C");
                    carItems[i-1].classList.add('active');
                    console.log("D");
                    break;
                }
            }
        }
    }
    else{
        if(carItems[carItems.length-1].classList.contains('active')){
            carItems[carItems.length-1].classList.remove('active');
            console.log("a");
            carItems[0].classList.add('active');
            console.log("b");
        }else{
            for (let i = 0; i < carItems.length - 1; i++) {
                if(carItems[i].classList.contains('active')){
                    carItems[i].classList.remove('active');
                    console.log("c");
                    carItems[i+1].classList.add('active');
                    console.log("d");
                    break;
                }
            }
        }
    }
    })
}); */

