TARGET = peter-marshall-credit.zip
FILES = peter-marshall-credit.php assets plugin-update-checker

all: build

build: clean
	zip -r $(TARGET) $(FILES)

clean:
	rm -f $(TARGET)
