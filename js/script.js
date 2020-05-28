let darkMode = localStorage.getItem("darkMode"); //guardamos darkmode en localstorage
const darkModeToggle = document.querySelector("#switch"); //le añadimos la constante de switch

const enableDarkMode = () => { //añadimos el atributo enabled a darkmode cuando está activo
    document.documentElement.setAttribute('data-theme', 'dark');
    localStorage.setItem("darkMode", "enabled");
};

const disableDarkMode = () => { //quitamos el atributo enabled del darkmode para desactivalo
    document.documentElement.setAttribute('data-theme', 'light')
    localStorage.setItem("darkMode", "null");
};

if (darkMode === "enabled"){ //si darkmode está enabled hara la transición de blanco a negro, sino, de negro a blanco.
    enableDarkMode();
}

darkModeToggle.addEventListener("click", () => {
    darkMode = localStorage.getItem("darkMode");
    if (darkMode !== "enabled"){
        trans();
        enableDarkMode();
        
    }else {
        trans();
        disableDarkMode();
    }
});
let trans = () => { //aplica la transición creada en el css 
    document.documentElement.classList.add('transition');
    window.setTimeout(() => {
        document.documentElement.classList.remove('transition');
    }, 2000)
}