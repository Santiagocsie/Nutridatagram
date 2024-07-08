from django.shortcuts import render

def login(request):
    """Retorna gestion pagina de login"""
    return render(request,"pages/login.html",{})

def menu(request):
    """Retorna gestion pagina de menu"""
    return render(request,"pages/menu.html",{})

def loginp(request):
    """Retorna gestion pagina de login.php"""
    return render(request,"pages/login.php",{})
