TARGET = peter-marshall-credit.zip
FILES = peter-marshall-credit.php assets/*

all: build

build: clean
	zip $(TARGET) $(FILES)

clean:
	rm -f $(TARGET)
