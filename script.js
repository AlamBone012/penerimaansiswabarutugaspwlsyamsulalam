document.addEventListener("DOMContentLoaded", function () {
  const input = document.getElementById("cariNama");
  const hasil = document.getElementById("hasilPencarian");

  input.addEventListener("keyup", function () {
    const keyword = input.value;

    if (keyword.length < 2) {
      hasil.innerHTML = "";
      return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "cari_siswa.php?nama=" + encodeURIComponent(keyword), true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        hasil.innerHTML = xhr.responseText;
      }
    };
    xhr.send();
  });
});
