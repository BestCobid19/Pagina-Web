let darkMode = localStorage.getItem("darkMode");
const darkModeToggle = document.querySelector("#switch");

const enableDarkMode = () => {
    document.documentElement.setAttribute('data-theme', 'dark');
    localStorage.setItem("darkMode", "enabled");
};

const disableDarkMode = () => {
    document.documentElement.setAttribute('data-theme', 'light')
    localStorage.setItem("darkMode", "null");
};

if (darkMode === "enabled"){
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
let trans = () => {
    document.documentElement.classList.add('transition');
    window.setTimeout(() => {
        document.documentElement.classList.remove('transition');
    }, 2000)
}