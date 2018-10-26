test = "!@#$%^&*()_+{}-="
file = open("./fuhao.txt",'a')
for i in test:
    file.write(i+"\n")
    print(i)
    