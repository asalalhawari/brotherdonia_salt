//@version=6
indicator(title="SharpShooter", overlay=true)

// Inputs
a = input.int(1, title="Key Value. 'This changes the sensitivity'")
c = input.int(10, title="ATR Period")
h = input.bool(false, title="Signals from Heikin Ashi Candles")

length = input.int(70, "Length", tooltip = "The Look-Back window for the Zero-Lag EMA calculations", group = "Main Calculations")
mult = input.float(1.2, "Band Multiplier", tooltip = "This value controls the thickness of the bands, a larger value makes the indicato less noisy", group = "Main Calculations")
t1 = input.timeframe("5", "Time frame 1", group = "Extra Timeframes")
t2 = input.timeframe("15", "Time frame 2", group = "Extra Timeframes")
t3 = input.timeframe("60", "Time frame 3", group = "Extra Timeframes")
t4 = input.timeframe("240", "Time frame 4", group = "Extra Timeframes")
t5 = input.timeframe("1D", "Time frame 5", group = "Extra Timeframes")
green = input.color(#00ffbb, "Bullish Color", group = "Appearance")
red = input.color(#ff1100, "Bearish Color", group = "Appearance")

xATR = ta.atr(c)
nLoss = a * xATR

haTicker = ticker.heikinashi(syminfo.tickerid)
src = h ? request.security(haTicker, timeframe.period, close) : close

vol = volume
volMA = ta.sma(vol, 20)  // 20-period SMA
rsiValue = ta.rsi(src, 14)
rsiBuy = rsiValue < 30
rsiSell = rsiValue > 70

highVolume = vol > volMA

var float xATRTrailingStop = na
xATRTrailingStop := src > nz(xATRTrailingStop[1]) and src[1] > nz(xATRTrailingStop[1]) ? math.max(nz(xATRTrailingStop[1]), src - nLoss) :
                     src < nz(xATRTrailingStop[1]) and src[1] < nz(xATRTrailingStop[1]) ? math.min(nz(xATRTrailingStop[1]), src + nLoss) :
                     src > nz(xATRTrailingStop[1]) ? src - nLoss : src + nLoss

var int pos = 0
pos := src[1] < nz(xATRTrailingStop[1]) and src > nz(xATRTrailingStop[1]) ? 1 :
       src[1] > nz(xATRTrailingStop[1]) and src < nz(xATRTrailingStop[1]) ? -1 : nz(pos[1])

xcolor = pos == -1 ? color.red : pos == 1 ? color.green : color.blue

emaValue = ta.ema(src, 1)
above = ta.crossover(emaValue, xATRTrailingStop)
below = ta.crossover(xATRTrailingStop, emaValue)

buy = src > xATRTrailingStop and above and highVolume
sell = src < xATRTrailingStop and below and highVolume

barbuy = src > xATRTrailingStop
barsell = src < xATRTrailingStop




lag = math.floor((length - 1) / 2)

zlema = ta.ema(src + (src - src[lag]), length)

volatility = ta.highest(ta.atr(length), length*3) * mult

var trend = 0

if ta.crossover(close, zlema+volatility)
    trend := 1

if ta.crossunder(close, zlema-volatility)
    trend := -1

zlemaColor = trend == 1 ? color.new(green, 70) : color.new(red, 70)
m = plot(zlema, title="Zero Lag Basis", linewidth=2, color=zlemaColor,force_overlay = true)
upper = plot(trend == -1 ? zlema+volatility : na, style = plot.style_linebr, color = color.new(red, 90), title = "Upper Deviation Band",force_overlay = true)
lower = plot(trend == 1 ? zlema-volatility : na, style = plot.style_linebr, color = color.new(green, 90), title = "Lower Deviation Band",force_overlay = true)

fill(m, upper, (open + close) / 2, zlema+volatility, color.new(red, 90), color.new(red, 70))
fill(m, lower, (open + close) / 2, zlema-volatility, color.new(green, 90), color.new(green, 70))


s1 = request.security(syminfo.tickerid, t1, trend)
s2 = request.security(syminfo.tickerid, t2, trend)
s3 = request.security(syminfo.tickerid, t3, trend)
s4 = request.security(syminfo.tickerid, t4, trend)
s5 = request.security(syminfo.tickerid, t5, trend)

s1a = s1 == 1 ? "Bullish" : "Bearish"
s2a = s2 == 1 ? "Bullish" : "Bearish"
s3a = s3 == 1 ? "Bullish" : "Bearish"
s4a = s4 == 1 ? "Bullish" : "Bearish"
s5a = s5 == 1 ? "Bullish" : "Bearish"

if barstate.islast
    var data_table = table.new(position=position.top_right, columns=3, rows=7, bgcolor=chart.bg_color, border_width=1, border_color=chart.fg_color, frame_color=chart.fg_color, frame_width=1)
    
    // Header of the table
    table.cell(data_table, text_halign=text.align_center, column=0, row=0, text="Time Frame", text_color=chart.fg_color)
    table.cell(data_table, text_halign=text.align_center, column=1, row=0, text="Signal", text_color=chart.fg_color)
    table.cell(data_table, text_halign=text.align_center, column=2, row=0, text="ATR Value", text_color=chart.fg_color)

    // Row 1 - Time frame 1
    table.cell(data_table, text_halign=text.align_center, column=0, row=1, text=t1, text_color=chart.fg_color)
    table.cell(data_table, text_halign=text.align_center, column=1, row=1, text=s1a, text_color=chart.fg_color, bgcolor=s1a == "Bullish" ? color.new(green, 70) : color.new(red, 70))
    table.cell(data_table, text_halign=text.align_center, column=2, row=1, text=str.tostring(xATR), text_color=chart.fg_color)

    // Row 2 - Time frame 2
    table.cell(data_table, text_halign=text.align_center, column=0, row=2, text=t2, text_color=chart.fg_color)
    table.cell(data_table, text_halign=text.align_center, column=1, row=2, text=s2a, text_color=chart.fg_color, bgcolor=s2a == "Bullish" ? color.new(green, 70) : color.new(red, 70))
    table.cell(data_table, text_halign=text.align_center, column=2, row=2, text=str.tostring(xATR), text_color=chart.fg_color)

    // Row 3 - Time frame 3
    table.cell(data_table, text_halign=text.align_center, column=0, row=3, text=t3, text_color=chart.fg_color)
    table.cell(data_table, text_halign=text.align_center, column=1, row=3, text=s3a, text_color=chart.fg_color, bgcolor=s3a == "Bullish" ? color.new(green, 70) : color.new(red, 70))
    table.cell(data_table, text_halign=text.align_center, column=2, row=3, text=str.tostring(xATR), text_color=chart.fg_color)

    // Row 4 - Time frame 4
    table.cell(data_table, text_halign=text.align_center, column=0, row=4, text=t4, text_color=chart.fg_color)
    table.cell(data_table, text_halign=text.align_center, column=1, row=4, text=s4a, text_color=chart.fg_color, bgcolor=s4a == "Bullish" ? color.new(green, 70) : color.new(red, 70))
    table.cell(data_table, text_halign=text.align_center, column=2, row=4, text=str.tostring(xATR), text_color=chart.fg_color)

    // Row 5 - Time frame 5
    table.cell(data_table, text_halign=text.align_center, column=0, row=5, text=t5, text_color=chart.fg_color)
    table.cell(data_table, text_halign=text.align_center, column=1, row=5, text=s5a, text_color=chart.fg_color, bgcolor=s5a == "Bullish" ? color.new(green, 70) : color.new(red, 70))
    table.cell(data_table, text_halign=text.align_center, column=2, row=5, text=str.tostring(xATR), text_color=chart.fg_color)

    // Row 6 - Trend Summary
    table.cell(data_table, text_halign=text.align_center, column=0, row=6, text="Trend", text_color=chart.fg_color)
    table.cell(data_table, text_halign=text.align_center, column=1, row=6, text=trend == 1 ? "Bullish" : "Bearish", text_color=chart.fg_color, bgcolor=trend == 1 ? color.new(green, 70) : color.new(red, 70))
    table.cell(data_table, text_halign=text.align_center, column=2, row=6, text=str.tostring(volatility), text_color=chart.fg_color)


plotshape(buy, title="Buy", text='Buy', style=shape.labelup, location=location.belowbar, color=color.green, textcolor=color.white, size=size.tiny,force_overlay = true)
plotshape(sell, title="Sell", text='Sell', style=shape.labeldown, location=location.abovebar, color=color.red, textcolor=color.white, size=size.tiny,force_overlay = true)


barcolor(barbuy ? color.green : na)
barcolor(barsell ? color.red : na)
