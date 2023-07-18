let pertanyaan = document.querySelectorAll('.pertanyaan');
const bodyChat = document.querySelector('.body-chat');
const clock = document.querySelector('.clock span');

var date = new Date();

// mengubah timezone ke Waktu Indonesia Barat (WIB)
// date.setUTCHours(date.getUTCHours() + 7);

var hours = date.getHours();

// mengambil menit saat ini
var minutes = date.getMinutes();

// menambahkan nol di depan jam dan menit jika nilainya kurang dari 10
hours = hours < 10 ? '0' + hours : hours;
minutes = minutes < 10 ? '0' + minutes : minutes;
clock.innerHTML =  `${hours}:${minutes}`;





function memilihJawaban(id){
    const jawabanSet = {
        1 : "Grobogan adalah salah satu kabupaten yang berada di provinsi Jawa Tengah, Indonesia. Ibu kotanya adalah Kecamatan Purwodadi Kota. Pada Sensus Penduduk Indonesia 2020, penduduk kabupaten Grobogan berjumlah 1.453.526 jiwa, dengan kepadatan penduduk 719 jiwa/km",
        2 : "Promo dapat didapat melalui menu promo dan memasukkan kedalam ticket yang tersedia!",
        3 : "Memesan tiket dapat dilakukan melalui menu pemesanan dan membayarnya dengan mengirim bukti pembayaran, kamu juga perlu harus menunggu verifikasi tiketmu!"
    }
    if (id == "1") {
        return jawabanSet[1]
    }else if(id == "2"){
        return jawabanSet[2]
    } else {
        return jawabanSet[3]
    }
}


async function getPertanyaan(jenis){
    return fetch(`http://127.0.0.1:8000/chat-bot/pertanyaan/${jenis}`)
    .then(res => res.json())
    .then(data => {
      const myData = data; // Memasukkan nilai dari data ke dalam variabel myData
      return myData; // Mengembalikan nilai dari variabel myData
    })
    .catch(error => console.error(error));
}


function pertanyaanBaru(a) {
    var date = new Date();

// mengubah timezone ke Waktu Indonesia Barat (WIB)
    // date.setUTCHours(date.getUTCHours() + 7);

    var hours = date.getHours();

// mengambil menit saat ini
    var minutes = date.getMinutes();

    // menambahkan nol di depan jam dan menit jika nilainya kurang dari 10
    hours = hours < 10 ? '0' + hours : hours;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    a.forEach( e => {
        e.addEventListener('click', () => {
            const chatUser = document.createElement('div');
                    chatUser.setAttribute("class", "chat-user");
                    chatUser.setAttribute("class", "pt-2");
                    chatUser.innerHTML = `
                    <div class="chat-user pt-2">
                                            <div class="speech-bubble-user">
                                                <span class="py-1 pertanyaan-pertama">${e.textContent}</span>
                                            </div>
                                        </div>
                    `
                    bodyChat.appendChild(chatUser);

            const namePertanyaan = e.getAttribute("name");

            if (namePertanyaan == "kembali"){
                const chatAdmin = document.createElement('div');
                const idPertanyaan = e.getAttribute("id");
                chatAdmin.setAttribute("class", "chat-admin");
                chatAdmin.setAttribute("class", "pt-2");
                chatAdmin.innerHTML = `
                    <div class="chat-admin pt-2">
                    <div class="speech-bubble">
                    <span class="py-1 pertanyaan-pertama">Pilih pertanyaan di bawah ini agar kami dapat membantu mu!</span>
                    <div class="pertanyaan w-100 py-1" id="1" name = "grobogan"><span class="text-primary">Pertanyaan terkait grobogan?</span></div>
                    <div class="pertanyaan w-100 py-1" id="2" name ="tiket"><span class="text-primary">Pertanyaan terkait tiket?</span></div>
                    <div class="pertanyaan w-100 py-1" id="3" name = "tempat wisata"><span class="text-primary">Pertanyaan terkait tempat wisata?</span></div>
                    <div class="clock d-flex justify-content-end"><span>05:59</span></div>
                    </div>
                                    
                                </div>
                    `;
                    bodyChat.appendChild(chatAdmin);
                    pertanyaanBaru(document.querySelectorAll('.pertanyaan'));
            } else {
                getPertanyaan(namePertanyaan)
                .then(data => {
                    const listPertanyaan = data.pertanyaan;
                    console.log(listPertanyaan)
                    const chatAdmin = document.createElement('div');
                    const idPertanyaan = e.getAttribute("id");
                    chatAdmin.setAttribute("class", "chat-admin");
                    chatAdmin.setAttribute("class", "pt-2");
                    let divPertanyaan = "";
                    listPertanyaan.forEach(tanya => {
                        divPertanyaan += `<div class="pertanyaan w-100 py-1 " id = "${tanya.id}" name = "${tanya.tipe}"><span class="text-primary">${tanya.pertanyaan}</span></div>`
                    })
                    chatAdmin.innerHTML = `
                    <div class="chat-admin pt-2">
                                    <div class="speech-bubble">
                                        <div class="jawaban">
                                            ${listPertanyaan.find(element => element.id === parseInt(idPertanyaan)).jawaban}
                                        </div>
                                        
                                        <span class="py-1 pertanyaan-pertama">Pilih pertanyaan di bawah ini agar kami dapat membantu mu!</span>
                                        ${divPertanyaan}
                                        <div class="pertanyaan w-100 py-1" name ="kembali"><span class="text-primary">Kembali</span></div>
                                        <div class="clock d-flex justify-content-end"><span>${hours + ":" + minutes}</span></div>
                                    </div>
                                    
                                </div>
                    `;
                    bodyChat.appendChild(chatAdmin);
                    pertanyaanBaru(document.querySelectorAll('.pertanyaan'))// Lakukan sesuatu dengan data yang dikembalikan
                })
                .catch(error => console.error(error));

            }

            


           
        })
    })
    
    
    
}

pertanyaanBaru(pertanyaan);
