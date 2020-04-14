let darckMode = localStorage.getItem("darkMode");
const darckModeToggle = document.querySelector("#switch");

const enableDarckMode = () => {
    document.documentElement.setAttribute('data-theme', 'dark');
    localStorage.setItem("darkMode", "enabled");
};

const disableDarkMode = () => {
    document.documentElement.setAttribute('data-theme', 'light')
    localStorage.setItem("darkMode", "null");
};

if (darckMode === "enabled"){
    enableDarckMode();
}

darckModeToggle.addEventListener("click", () => {
    darckMode = localStorage.getItem("darkMode");
    if (darckMode !== "enabled"){
        enableDarckMode();
        
    }else {
        disableDarkMode();
    }
});
